import React from 'react';
import {Container} from 'reactstrap';
import Navigation from '../../components/Navigation';
import Routes from '../../routes';

const Home = () => {
    return (
        <>
            <Navigation/>
            <Container style={{marginTop: '40px'}}>
                <Routes/>
            </Container>
        </>
    );
};

export default Home;