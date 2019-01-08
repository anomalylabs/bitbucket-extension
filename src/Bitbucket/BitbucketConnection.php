<?php namespace Anomaly\BitbucketExtension\Bitbucket;

use Bitbucket\Client;

/**
 * Class BitbucketConnection
 *
 * This is a singleton bound to the
 * pre-configured BitbucketOauth class.
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BitbucketConnection
{

    /**
     * The Bitbucket connection.
     *
     * @var Client
     */
    protected $connection;

    /**
     * Create a new BitbucketConnection instance.
     *
     * @param Client $connection
     */
    public function __construct(Client $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get the connection.
     *
     * @return Client
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Pass methods through.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }

}
