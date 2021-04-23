import React from 'react';
import {Route, Switch} from 'react-router-dom';
import Counter from '../pages/Counter';

const Routes = () => {
    return (
        <Switch>
            <Route path="/counter" component={Counter}/>
        </Switch>
    );
};

export default Routes;
