import React, { useState } from 'react';
import { Button } from 'reactstrap';

const Counter = () => {
    const [counter, setCounter] = useState(0);
    const handleClick = () => setCounter(counter + 1);

    return (
        <div>
            <p>Counter: {counter}</p>
            <Button onClick={handleClick}>Increment</Button>
        </div>
    );
};

export default Counter;