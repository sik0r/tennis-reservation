import React from 'react';
import {Route, Switch} from 'react-router-dom';
import Counter from '../pages/Counter';
import Calendar from "../components/Calendar";
import Register from "../pages/Register";

const Routes = () => {
    return (
        <Switch>
            <Route exact={true} path="/" component={Calendar}/>
            <Route exact={true} path="/register" component={Register}/>
            <Route exact={true} path="/counter" component={Counter}/>
        </Switch>
    );
};

export default Routes;
