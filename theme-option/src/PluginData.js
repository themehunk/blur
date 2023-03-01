import React, { useState, useEffect } from 'react';
import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

function PluginData() {
  
  const [data, setData] = useState(null);

  const homeUrl = wpapi.homeUrl;

  const ajaxUrl = wpapi.ajaxurl;

  const Url = `${homeUrl}/wp-json/wp/v1/blur`;

  let msg;

  let cls;

  let instl;

  if(wpapi.thiowc_status.thiowc_instl == true){

    if(wpapi.thiowc_status.thiowc_active == true){
  
      msg = 'Activated';
      cls = 'button btn-activated disabled';
    
      }else{
    
      msg = 'Activate Now';
      cls = 'button btn-active-now';
    
      }
    
  }else{
    
    msg = 'Install Now';
    cls = 'button btn-install-now';
    instl= 'install'

  }

  const [message, setMessage] = useState(msg);

  const [buttonClass, setButtonClass] = useState(cls);

  const [instlplg, setInstlplg] = useState(instl);
  
  
  useEffect(() => {
    fetch(`${Url}`)
      .then(response => response.json())
      .then(data => {
        setData(data);
      });  

  }, []);

  if (!data) {
    return <div>Loading...</div>;
  }

  const checkActive = async (e) => {

      const data = { 
        init: e.target.dataset.init,
        slug: e.target.dataset.slug,
        instl: e.target.dataset.instl, 
        nonce: wpapi.wpnonce, 
        };

      const response = await fetch(`${ajaxUrl}?action=blur_install_plugin`, {
        method: 'POST',
        body: new URLSearchParams(data)
      });

      const plgdata = await response.text();

      try {

        console.log(plgdata);

       setMessage('Activated');
       setButtonClass('button btn-activated disabled');

      } catch (error) {

        console.error('Error parsing JSON:', error);

      }
  };

  return (
    <Fragment>
      <div className="recommended-option-wrap">
         <div className="th-option-2-col">
          <div className="th-option-row content-box">
             <div className="th-col">
              <img src={data.th_all_in_one_woo_cart.imgUrl}/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
            <h4>{data.th_all_in_one_woo_cart.name}</h4>
            <a className="plugin-detail thickbox open-plugin-details-modal" href={data.th_all_in_one_woo_cart.detail_link}>{__( 'Details & Version', 'blur' )}</a>
            </div>
            <button onClick={checkActive} data-instl={instlplg} data-init={data.th_all_in_one_woo_cart.active_filename} data-slug={data.th_all_in_one_woo_cart.slug} className= {`${data.th_all_in_one_woo_cart.slug} ${buttonClass}`} >{message}                
            </button>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
  
}

export default PluginData;