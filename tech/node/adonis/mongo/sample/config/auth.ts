/**
 * Config source: https://git.io/JY0mp
 *
 * Feel free to let us know via PR, if you find something broken in this config
 * file.
 */

import type { AuthConfig } from '@ioc:Adonis/Addons/Auth'

/*
|--------------------------------------------------------------------------
| Authentication Mapping
|--------------------------------------------------------------------------
|
| List of available authentication mapping. You must first define them
| inside the `contracts/auth.ts` file before mentioning them here.
|
*/
const authConfig: AuthConfig = {
  guard: 'api',
  guards: {
    /*
    |--------------------------------------------------------------------------
    | OAT Guard
    |--------------------------------------------------------------------------
    |
    | OAT (Opaque access tokens) guard uses database backed tokens to authenticate
    | HTTP request. This guard DOES NOT rely on sessions or cookies and uses
    | Authorization header value for authentication.
    |
    | Use this guard to authenticate mobile apps or web clients that cannot rely
    | on cookies/sessions.
    |
    */
    api: {
      driver: 'oat',

      /*
      |--------------------------------------------------------------------------
      | Redis provider for managing tokens
      |--------------------------------------------------------------------------
      |
      | Uses Redis for managing tokens. We recommend using the "redis" driver
      | over the "database" driver when the tokens based auth is the
      | primary authentication mode.
      |
      | Redis ensure that all the expired tokens gets cleaned up automatically.
      | Whereas with SQL, you have to cleanup expired tokens manually.
      |
      | The foreignKey column is used to make the relationship between the user
      | and the token. You are free to use any column name here.
      |
      */
      tokenProvider: {
        type: 'api',
        driver: 'redis',
        redisConnection: 'local',
        foreignKey: 'user_id',
      },

      provider: {
        /*
        |--------------------------------------------------------------------------
        | Driver
        |--------------------------------------------------------------------------
        |
        | Name of the driver
        |
        */
        driver: 'prisma',

        /*
        |--------------------------------------------------------------------------
        | Identifier key
        |--------------------------------------------------------------------------
        |
        | The identifier key is the unique key inside the defined database table.
        | In most cases specifying the primary key is the right choice.
        |
        */
        identifierKey: 'id',

        /*
        |--------------------------------------------------------------------------
        | Uids
        |--------------------------------------------------------------------------
        |
        | Uids are used to search a user against one of the mentioned columns. During
        | login, the auth module will search the user mentioned value against one
        | of the mentioned columns to find their user record.
        |
        */
        uids: ['email'],

        /*
        |--------------------------------------------------------------------------
        | Database table
        |--------------------------------------------------------------------------
        |
        | The database table to query. Make sure the database table has a `password`
        | field and `remember_me_token` column.
        |
        */
        model: 'user',
      },
    },
  },
}

export default authConfig
