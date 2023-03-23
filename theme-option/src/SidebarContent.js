import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const SidebarContent = () => {
    return (
        <Fragment>
            <div className="sidebar-option-content-wrp">
               <div className="content-box">
                <h3> {__( 'Blur Premium Theme', 'blur' )}</h3>
                <p>{__( 'You’re using the free version of the Blur Theme with limited features and functionality. You can upgrade to Blur Pro Theme for Advanced features, Custom Sections, and more useful options to customize your website easily.', 'blur' )}</p>
                <a href="https://themehunk.com/pro-wordpress-themes/" className="content-link button" target="_blank"> {__( 'Upgrade To Pro', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Why Upgrade?', 'blur' )}</h3>
                <p>{__( 'Upgrading to Blur Premium you will unlock dozen of unique features that will take your website to the next level. See the Comparison table for more details.', 'blur' )}</p>
                <a href="https://themehunk.com/pro-wordpress-themes/" className="content-link button"> {__( 'Pro Demo', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Leave us a review', 'blur' )}</h3>
                <p>{__( 'We would love to hear your feedback.', 'blur' )}</p>
                <a href="https://wordpress.org/support/theme/blur/reviews/#new-post" className="content-link" target="_blank"> {__( 'Submit review', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Video Tutorials', 'blur' )}</h3>
                <p>{__( 'Want a guide? We have video tutorials to walk you through getting started.', 'blur' )}</p>
                <a href="https://www.youtube.com/@ThemeHunk/featured" className="content-link" target="_blank"> {__( 'Watch Videos', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Support', 'blur' )}</h3>
                <p>{__( 'Have a question, we are happy to help! Get in touch with our support team.', 'blur' )}</p>
                <a href="https://themehunk.com/contact-us/" className="content-link" target="_blank"> {__( 'Submit a Ticket', 'blur' )}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default SidebarContent;