<?php
class Produto{
    private int $id; 
    private string $nome;
    private float $preco;
    private int $estoque;

    public function __construct(int $id, string $nome,float $preco,int $estoque ){
       $this->id=$id;
       $this->nome=$nome;
       $this->preco=$preco;
       $this->estoque=$estoque;
    }
    

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void 
    {
      $this->id=$id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome($nome): void 
    {
        $this->nome=$nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public  function  setPreco($preco): void{
        $this->preco=$preco;
    }

    public function getEstoque(): int{
        return $this->estoque;
    }

    public function setEstoque($estoque): void
    {
        $this->estoque=$estoque;
    }

    public function reduzirEstoque(int $quantidade): void{
       $this->estoque-=$quantidade;
    } 


}