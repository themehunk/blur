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

  const checkActive = async (e) => {

      const data = { 
        init: e.target.dataset.init,
        slug: e.target.dataset.slug, 
        };

      const response = await fetch(`${ajaxUrl}?action=blur_install_plugin`, {
        method: 'POST',
        body: JSON.stringify(data)
      });

      const jsondata = await response.json();

      try {

       console.log(jsondata);
        // Process the data here
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
            <button onClick={checkActive} data-activated="Activated" data-msg="Activating" data-init={data.th_all_in_one_woo_cart.active_filename} data-slug={data.th_all_in_one_woo_cart.slug} className= {`button install-now button ${data.th_all_in_one_woo_cart.slug}`} >{__( 'Install Now', 'blur' )}                
            </button>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
  
}

export default PluginData;