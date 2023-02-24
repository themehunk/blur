import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const SidebarContent = () => {
    return (
        <Fragment>
            <div className="sidebar-option-content-wrp">
               <div className="content-box">
                <h3> {__( 'Big Store Premium Theme', 'blur' )}</h3>
                <p>{__( 'If you like the free version of this theme, you will LOVE the full version of Big Store which includes numerous Advanced features, Custom Sections, Section Ordering and more useful options to customize your website.', 'blur' )}</p>
                <a href="#" className="content-link button"> {__( 'Upgrade To Pro', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Why Upgrade?', 'blur' )}</h3>
                <p>{__( 'Upgrading to Big Store Premium you will unlock dozen of unique features that will take your website to the next level. See the Comparison table for more details.', 'blur' )}</p>
                <a href="#" className="content-link button"> {__( 'Pro Demo', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Leave us a review', 'blur' )}</h3>
                <p>{__( 'We would love to hear your feedback.', 'blur' )}</p>
                <a href="#" className="content-link"> {__( 'Submit review', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Video Tutorials', 'blur' )}</h3>
                <p>{__( 'Want a guide? We have video tutorials to walk you through getting started.', 'blur' )}</p>
                <a href="#" className="content-link"> {__( 'Watch Videos', 'blur' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Support', 'blur' )}</h3>
                <p>{__( 'Have a question, we are happy to help! Get in touch with our support team.', 'blur' )}</p>
                <a href="#" className="content-link"> {__( 'Submit a Ticket', 'blur' )}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default SidebarContent;