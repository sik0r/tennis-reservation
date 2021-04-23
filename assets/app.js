import './styles/app.css';
import 'bootstrap/dist/css/bootstrap.css';

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import Home from './pages/Home';

ReactDOM.render(
    <Router>
        <Home/>
    </Router>,
    document.getElementById('root')
);
