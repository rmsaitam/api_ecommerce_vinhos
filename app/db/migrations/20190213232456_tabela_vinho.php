<?php


use Phinx\Migration\AbstractMigration;

class TabelaVinho extends AbstractMigration
{
    public function up()
    {
        if(!$this->hasTable('vinhos')) {
            $table = $this->table('vinhos');
            $table 
                 ->addColumn('nome', 'string', ['limit' => 255])
                 ->addColumn('tipo', 'string', ['limit' => 100])
                 ->addColumn('preco', 'decimal', ['precision'=>10, 
                    'scale'=>2])
                 ->addColumn('peso', 'integer')
                ->save();
        }
    }
    public function down()
    {
        if($this->hasTable('vinhos')) {
            $this->dropTable('vinhos');
        }
    }
}
