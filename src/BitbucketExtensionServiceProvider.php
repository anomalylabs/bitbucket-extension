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

        $username = $config->get('anomaly.extension.bitbucket::bitbucket.username');
        $password = $config->get('anomaly.extension.bitbucket::bitbucket.password');

        /**
         * Setup our pre-configured Bitbucket client instance alias.
         */
        if ($username && $password) {

            $this->app->singleton(
                BitbucketConnection::class,
                function () use ($username, $password) {

                    $client = new Client();

                    $client->authenticate(Client::AUTH_HTTP_PASSWORD, $username, $password);

                    return new BitbucketConnection($client);
                }
            );
        }
    }

}
