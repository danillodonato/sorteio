<?php

class Jogos
{
    private $quantidadeDezenas;
    private $resultado;
    private $totalJogos;
    private $jogos;

    function __construct($quantidade, $total)
    {
        $this->setQuantidadeDezenas($quantidade);
        $this->setTotalJogos($total);
    }
    /**
     * Get the value of quantidadeDezenas
     */ 
    public function getQuantidadeDezenas()
    {
        return $this->quantidadeDezenas;
    }

    /**
     * Set the value of quantidadeDezenas
     *
     * @return  self
     */ 
    public function setQuantidadeDezenas($quantidadeDezenas)
    {
        $this->quantidadeDezenas = $quantidadeDezenas;

        return $this;
    }

    /**
     * Get the value of resultado
     */ 
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set the value of resultado
     *
     * @return  self
     */ 
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get the value of totalJogos
     */ 
    public function getTotalJogos()
    {
        return $this->totalJogos;
    }

    /**
     * Set the value of totalJogos
     *
     * @return  self
     */ 
    public function setTotalJogos($totalJogos)
    {
        $this->totalJogos = $totalJogos;

        return $this;
    }

    /**
     * Get the value of jogos
     */ 
    public function getJogos()
    {
        return $this->jogos;
    }

    /**
     * Set the value of jogos
     *
     * @return  self
     */ 
    public function setJogos($jogos)
    {
        $this->jogos = $jogos;

        return $this;
    }

    private function geraDezenas($quantidade = NULL)
    {
        $quantidade = is_null($quantidade) ? $this->getQuantidadeDezenas() : $quantidade;
        
        $dezenas = [];
        
        $a = 1;

        while ($a <= $quantidade) {
            $randomDezena = rand(1, 60);
            
            if (!in_array($randomDezena, $dezenas)) {
                
                array_push($dezenas, str_pad($randomDezena, 2, "0", STR_PAD_LEFT));
                
                $a++;
            }
        }

        sort($dezenas);

        return $dezenas;
    }

    public function geraJogos()
    {
        $jogos = [];

        for ($i=0; $i < $this->getTotalJogos(); $i++) { 
            array_push($jogos, $this->geraDezenas());
        }
        
        $this->setJogos($jogos);

        return $this->getJogos();
    }

    public function sorteiaDezenas() {
        $this->setResultado($this->geraDezenas(6));

        return $this->getResultado();
    }

}
