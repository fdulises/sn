<?php

namespace libs;

interface controllerAdapter{
    public function start( array $args ): bool;
}