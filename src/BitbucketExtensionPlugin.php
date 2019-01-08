<?php namespace Anomaly\BitbucketExtension\Bitbucket;

use Abraham\BitbucketOAuth\BitbucketOAuth;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Addon\Plugin\PluginCriteria;
use Anomaly\Streams\Platform\Support\Collection;

/**
 * Class BitbucketExtensionPlugin
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BitbucketExtensionPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'bitbucket',
                function ($method) {
                    return new PluginCriteria(
                        'get',
                        function (Collection $options, BitbucketConnection $connection) use ($method) {

                            /* @var BitbucketOAuth $connection */
                            return $connection->get($method, $options->all());
                        }
                    );
                }
            ),
        ];
    }
}
