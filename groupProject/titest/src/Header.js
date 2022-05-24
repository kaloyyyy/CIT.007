export function Header(){
    return (
        <div className="navbar">
            <div className="navComp cursive">
                <div className="nav-link logo-name"><a>
                    <div className="logo-div">

                    </div>
                    <div className="logo-span">
                        <span className="navMargin none-mobile">Komi-sion</span>
                    </div>
                </a></div>
                <div className="nav-link tagline">
                    <span className="navMargin tagline none-mobile">komisions for the kommunity</span></div>
            </div>
            <div className="navComp right">
                <div className="nav-link" id="home"><a href="/groupProject/public/index.php">
                    <i className="fa-solid fa-house svg"></i>
                    <span className="navMargin none-mobile">home</span></a></div>
                <div className="nav-link"><a href="/groupProject/src/browse/browse.php">
                    <i className="fa-solid fa-magnifying-glass svg"></i>
                    <span className="navMargin none-mobile">browse</span></a></div>
                <div className="nav-link"><a>
                    <i className="fa-solid fa-circle-info svg"></i>
                    <span className="navMargin none-mobile">about</span></a></div>
                <div className="nav-link"><a href="/groupProject/src/user/login.php">
                    <i className="fa-solid fa-user svg"></i>
                    <span className="navMargin none-mobile">
                    user
                    </span></a></div>
            </div>
        </div>)
}