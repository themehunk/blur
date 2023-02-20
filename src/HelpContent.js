import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const HelpContent = () => {
    return (
        <Fragment>
            <div className="option-content-wrp">
               <div className="content-box">
                <h3> {__( 'Contact Support', 'blur' )}</h3>
                <p>{__( 'If you need any help you can contact to our support team', 'blur' )}</p>
                <a href="#" className="content-link "> {__( 'Need help ?', 'blur' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( 'Documentation', 'blur' )}</h3>
                <p>{__( 'Our WordPress Theme is well documented, you can go with our documentation and learn to customize Big Store.', 'blur' )}</p>
                
                <a href="#" className="content-link "> {__( 'Go to Doc', 'blur' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( 'Create a child theme', 'blur' )}</h3>
                <p>{__( 'Before modifying theme core files. You should create child theme to make those changes update proof. Please follow this link to create child theme.', 'blur' )}</p>
                <a href="#" className="content-link "> {__( 'Create Child Theme', 'blur' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( 'Join Group', 'blur' )}</h3>
                <p>{__( 'Join the community of friendly ThemeHunk users. Get connected, share opinion, ask questions and help each other !', 'blur' )}</p>
                <a href="#" className="content-link button"> {__( 'Join Our Facebook Group', 'blur' )}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default HelpContent;