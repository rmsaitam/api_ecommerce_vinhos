<?php


use Phinx\Migration\AbstractMigration;

class TabelaVendaVinho extends AbstractMigration
{
    public function up()
    {
        if(!$this->hasTable('venda_vinho')) {
            $table = $this->table('venda_vinho');
            $table 
                 ->addColumn('venda_id', 'integer')
                 ->addColumn('vinho_id', 'integer')
                 ->addColumn('quantidade', 'integer')
                 ->addForeignKey('venda_id', 'vendas', 'id', 
                    ['delete' => 'RESTRICT','update' => 'RESTRICT'])
                 ->addForeignKey('vinho_id', 'vinhos', 'id', 
                    ['delete' => 'RESTRICT','update' => 'RESTRICT'])
                ->save();
        }
    }
    public function down()
    {
        if($this->hasTable('venda_vinho')) {
            $this->dropTable('venda_vinho');
        }
    }
}
