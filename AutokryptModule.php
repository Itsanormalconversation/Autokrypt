<?php

require_once __DIR__ . '/../core/AutokryptFormula.php';

abstract class AutokryptModule
{
    protected AutokryptFormula $formula;

    public function __construct()
    {
        $this->formula = new AutokryptFormula();
    }

    abstract public function analyze($input): array;
}
