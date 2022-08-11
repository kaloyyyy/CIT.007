import React, {Component} from "react";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faHouse, faInfoCircle, faMagnifyingGlass, faUser} from '@fortawesome/free-solid-svg-icons'
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from "react-router-dom";

class Navbar extends Component {
    render() {
        return (<Router>
                <nav className="container">
                    <div className="navbar">
                        <div className="navComp cursive">
                            <div className="nav-link logo-name">
                                <Link to="/">
                                    <div className="logo-div">

                                    </div>
                                    <div className="logo-span">
                                        <span className="navMargin none-mobile">Komi-sion</span>
                                    </div>
                                </Link></div>
                            <div className="nav-link tagline">
                                <span className="navMargin tagline none-mobile">komisions for the kommunity</span></div>
                        </div>
                        <div className="navComp right">
                            <div className="nav-link" id="home"><Link to="/">
                                <FontAwesomeIcon icon={faHouse} className="svg"/>
                                <span className="navMargin none-mobile">home</span></Link></div>
                            <div className="nav-link"><Link to="/browse">
                                <FontAwesomeIcon icon={faMagnifyingGlass} className="svg"/>
                                <span className="navMargin none-mobile">browse</span></Link></div>
                            <div className="nav-link"><Link to="/about">
                                <FontAwesomeIcon icon={faInfoCircle} className="svg"/>
                                <span className="navMargin none-mobile">about</span></Link></div>
                            <div className="nav-link"><Link to="/user">
                                <FontAwesomeIcon icon={faUser} className="svg"/>
                                <span className="navMargin none-mobile">
                            user</span></Link></div>
                        </div>
                    </div>
                </nav>
            </Router>
        );
    }
}

export default Navbar;
