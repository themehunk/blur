import React, { useState, useEffect } from 'react';
import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

function PluginData() {
  
  const [data, setData] = useState(null);

  const homeUrl = wpapi.homeUrl;

  const ajaxUrl = wpapi.ajaxurl;

  const Url = `${homeUrl}/wp-json/wp/v1/blur`;
  
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

  function Button(props, actsts,  actcls) {

    if(props.inststatus == 'installed' ){
     
      if(props.actstatus == true){

        actsts = 'Activated';
        actcls = 'button btn activated disabled';
  
      }else{
  
        actsts = 'Active Now';
        actcls = 'button btn active-now';
  
      }

    }else{
      
       actsts = 'Install Now';
       actcls = 'button btn install-now'

    }
    
   
    const [message, setMessage] = useState(actsts);
    const [updateMsg, setupdateMsg] = useState(actcls);

    const checkActive = async (e) => {

      setupdateMsg('button btn updating-message');

      const data = { 

        init: e.target.dataset.init,
        slug: e.target.dataset.slug,
        instl: e.target.dataset.inststatus, 
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
       setupdateMsg('button btn activated disabled');

      } catch (error) {

        console.error('Error parsing JSON:', error);

      }

   }
   
    return (
      <button 
      onClick={checkActive} 
      data-label={message}
      data-init={props.init}
      data-slug={props.slug}
      data-instl={props.instl}
      className={updateMsg}
      data-actstatus={props.actstatus}
      data-inststatus={props.inststatus}
      >
      {message}
      </button>
    );

  }

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
            <Button init={data.th_all_in_one_woo_cart.active_filename} slug={data.th_all_in_one_woo_cart.slug} actstatus={wpapi.thiowc_status.thiowc_active} inststatus={wpapi.thiowc_status.thiowc_instl}>                
            </Button>
            </div>
          </div>
          <div className="th-option-row content-box">
             <div className="th-col">
              <img src={data.th_advance_product_search.imgUrl}/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
            <h4>{data.th_advance_product_search.name}</h4>
            <a className="plugin-detail thickbox open-plugin-details-modal" href={data.th_advance_product_search.detail_link}>{__( 'Details & Version', 'blur' )}</a>
            </div>
            <Button init={data.th_advance_product_search.active_filename} slug={data.th_advance_product_search.slug} actstatus={wpapi.thaps_status.thaps_active} inststatus={wpapi.thaps_status.thaps_instl} >               
            </Button>
            
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
  
}

export default PluginData;