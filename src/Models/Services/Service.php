<?php

declare(strict_types = 1);

namespace Nodes\ServiceAuthenticator\Models\Services;

use Nodes\Database\Eloquent\Model as NodesModel;

/**
 * Class Service
 *
 * @package Nodes\ServiceAuthenticator\Models\Services
 */
class Service extends NodesModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'base_url',
        'token',
        'type',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    const TYPE_SERVER = 'server';

    const TYPE_CLIENT = 'client';

    /**
     * isServer
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @return bool
     */
    public function isServer() : bool
    {
        return $this->type == self::TYPE_SERVER;
    }

    /**
     * isClient
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @return bool
     */
    public function isClient() : bool
    {
        return $this->type == self::TYPE_CLIENT;
    }

    /**
     * resetThisToken
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @return void
     */
    public function resetThisToken()
    {
        $this->update([
            'this_token' => str_random(36),
        ]);
    }
}
