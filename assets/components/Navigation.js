import React, { useState } from 'react';
import {NavLink} from 'react-router-dom';
import {
    Collapse,
    Navbar,
    NavbarToggler,
    NavbarBrand,
    Nav,
    NavItem,
    NavbarText
  } from 'reactstrap';

const Navigation = () => {
    const [isOpen, setIsOpen] = useState(false);
    const toggle = () => setIsOpen(!isOpen);

    return (
        <Navbar color="dark" dark expand="md">
            <NavbarBrand to="/" tag={NavLink}>Home</NavbarBrand>
            <NavbarToggler onClick={toggle} />
            <Collapse isOpen={isOpen} navbar>
                <Nav className="mr-auto" navbar>
                    <NavItem>
                        <NavLink className="nav-link" to="/counter">Counter</NavLink>
                    </NavItem>
                    <NavItem className="float-right">
                        <NavLink className="nav-link" to="/register">Rejestracja</NavLink>
                    </NavItem>
                </Nav>
                <NavbarText>TENNIS</NavbarText>
            </Collapse>
        </Navbar>
    );
}

export default Navigation;