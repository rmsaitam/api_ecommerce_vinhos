<?php


use Phinx\Migration\AbstractMigration;

class TabelaVendas extends AbstractMigration
{
    public function up()
    {
        if(!$this->hasTable('vendas')) {
            $table = $this->table('vendas');
            $table 
                ->addColumn('data', 'date')
                ->addColumn('frete', 'decimal', 
                    ['precision'=>10, 'scale'=>2])
                ->addColumn('descricao', 'string', ['limit' => 255])
                ->save();
        }
    }
    public function down()
    {
        if($this->hasTable('vendas')) {
            $this->dropTable('vendas');
        }
    }
}
