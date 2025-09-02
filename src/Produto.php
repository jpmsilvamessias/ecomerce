<?php
class Produto{
    private int $id; 
    private string $name;
    private float $preco;
    private int $estoque;

    public function __construct__(int $id, string $name,float $preco,int $idade){
       $this->id=$id;
       $this->name=$name;
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
  

    


}