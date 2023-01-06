<?php

namespace Mateodioev\Utils;

use stdClass;

class fakeStdClass
{
    protected stdClass $std;
    protected mixed $defaultReturnValue;

    public function __construct(?stdClass $std = null)
    {
        if ($std !== null) {
            $this->std = $std;
        } else {
            $this->std = new stdClass();
        }

        $this->defaultReturnValue = '';
    }

    public function setReturnValue(mixed $value): fakeStdClass
    {
        $this->defaultReturnValue = $value;
        return $this;
    }

    public function getIntance(): fakeStdClass
    {
        return $this;
    }

    public function __set($name, $value)
    {
        $this->std->$name = $value;
    }

    public function __get($name)
    {
        return $this->std->$name ?? $this->defaultReturnValue;
    }

    public function __toString()
    {
        return json_encode($this->std);
    }

    public function __debugInfo()
    {
        return (array) $this->std;
    }
}
