import {Fragment} from '@wordpress/element';

const OptionHeader = () => {
    return (
        <Fragment>
        <div className="blur-theme-options-header">
          <div className="th-option-area">
           <div className="th-option-top-hdr">
              <div className="th-col1">
              <div className="th-logo-img">
                        <a target="_blank" href="#" className=""> 
                        <span className="logo-image">
                         <img className="logo-img" src="http://localhost/wp1/wp-content/themes/th-shop-mania/lib/th-option/assets/images/icon.png"></img>
                         </span>
                        </a>
                    </div> 
              </div>
              <div className="th-col2">
                    <div className="th-option-heading">
                       <h2>Welcome To Blur Theme</h2>
                       <p>Blur Theme is a Free WooCommerce theme for creating clean and professional shopping stores.</p>
                    </div>
                    <div className="th-option-detail">
                        <p className="th-version">Version 1.2.6</p>
                        <span>Free</span>
                    </div>
              </div>
            </div>

            
          </div>
        </div>
        </Fragment>
    );
  };
  
export default OptionHeader;