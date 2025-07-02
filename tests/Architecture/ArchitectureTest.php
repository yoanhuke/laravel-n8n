<?php

test('no dump & die')
    ->expect(['dd', 'dump', 'var_dump', 'ray', 'dumpRawSql'])
    ->not->toBeUsed();
