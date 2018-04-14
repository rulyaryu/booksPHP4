<?php 

namespace Helpers;

function isEqualTo($predicate, $current) {
    return $predicate === $current ? true : false;
}

function getStartIdx($page, $perpage) {
    return $page * $perpage - $perpage;
}