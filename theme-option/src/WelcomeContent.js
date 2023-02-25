import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const WelcomeContent = () => {
    return (
        <Fragment>
            <div className="option-content-wrp">
               <div className="content-box">
                <h3> {__( '1. Install Recommended Plugins', 'blur' )}</h3>
                <p>{__( 'We highly Recommend to install ThemeHunk Customizer plugin to get all customization options in Big Store theme. Also install recommended plugins available in recommended tab.', 'blur' )}</p>
               </div>
               <div className="content-box">
                <h3> {__( '2. Setup Home Page', 'blur' )}</h3>
                <p>{__( 'To set up the HomePage in Big Store theme, Just follow the below given Instructions.', 'blur' )}</p>
                <p>{__( 'Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.', 'blur' )}</p>
                <p>{__( 'Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.', 'blur' )}</p>
                <a href="#" className="content-link button"> {__( 'Go to Doc', 'blur' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( '3. Customize Your Website', 'blur' )}</h3>
                <p>{__( 'Big Store theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel', 'blur' )}</p>
                <a href="#" className="content-link button"> {__( 'Start Customize', 'blur' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( '4. Customizer Links', 'blur' )}</h3>
                <p>{__( 'Big Store theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel', 'blur' )}</p>
                <a href="#" className="content-link button"> {__( 'Start Customize', 'blur' )}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default WelcomeContent;