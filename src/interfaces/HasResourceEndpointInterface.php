<?php
namespace proworkflow\interfaces;

interface HasResourceEndpointInterface
{
    public function getResourcePath();

    public function getResourceName();
}