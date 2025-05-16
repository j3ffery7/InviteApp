<?php

namespace OCA\InviteApp\Migrations;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version0001DateTokenTable extends SimpleMigrationStep {

    public function changeSchema(
        IOutput $output,
        Closure $schemaClosure,
        array $options
    ): ISchemaWrapper {
        /** @var ISchemaWrapper $schema */
        $schema = $schemaClosure();

        if (!$schema->hasTable('inviteapp_tokens')) {
            $table = $schema->createTable('inviteapp_tokens');
            $table->addColumn('id', 'bigint', ['autoincrement' => true]);
            $table->addColumn('token', 'string', ['length' => 64]);
            $table->addColumn('email', 'string', ['length' => 255]);
            $table->addColumn('group_id', 'string', ['length' => 64]);
            $table->addColumn('expires_at', 'bigint');
            $table->setPrimaryKey(['id']);
            $table->addUniqueIndex(['token'], 'idx_inviteapp_token');
        }

        return $schema;
    }
}
