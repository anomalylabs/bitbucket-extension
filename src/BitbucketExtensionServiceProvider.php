<?php namespace Anomaly\BitbucketExtension;

use Abraham\BitbucketOAuth\BitbucketOAuth;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\BitbucketExtension\Bitbucket\BitbucketConnection;
use Anomaly\BitbucketExtension\Bitbucket\BitbucketExtensionPlugin;
use Bitbucket\Client;
use Illuminate\Contracts\Config\Repository;

/**
 * Class BitbucketExtensionServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BitbucketExtensionServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        BitbucketExtensionPlugin::class,
    ];

    /**
     * Boot the addon.
     *
     * @param Repository $config
     */
    public function boot(Repository $config)
    {

        /**
         * Setup our pre-configured Bitbucket client instance alias.
         */
        if ($token = $config->get('anomaly.extension.bitbucket::bitbucket.token')) {
            $this->app->singleton(
                BitbucketConnection::class,
                function () use ($token) {

                    $client = new Client();

                    $client->authenticate($token, null, 'http_token');

                    return new BitbucketConnection($client);
                }
            );
        }
    }

}
