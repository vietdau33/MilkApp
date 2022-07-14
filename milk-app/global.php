<?php

function logined(): bool
{
    return auth()->check();
}
