<?php
use Migrations\AbstractMigration;

class AddColumnTokenToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table
            ->addColumn('token','string', [
                'limit' => 255,
                'null' => true,
                'default' => null,
                'after' => 'password',
            ])
            // token expires date
            ->addColumn('token_expires','datetime', [
                'default' => null,
                'after' => 'token',
                'null' => true,
                'after' => 'token',
            ]);
        $table->update();
    }
}
