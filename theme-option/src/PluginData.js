import React, { useState, useEffect } from 'react';
import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

function PluginData() {
  
  const [data, setData] = useState(null);

  const homeUrl = wpapi.homeUrl;

  const Url = `${homeUrl}/wp-json/wp/v1/blur`;
  
  useEffect(() => {
    fetch(`${Url}`)
      .then(response => response.json())
      .then(data => {
        setData(data);
      });
  }, []);

  console.log({data});

  if (!data) {
    return <div>Loading...</div>;
  }

  return (
    <Fragment>
      <div className="recommended-option-wrap">
         <div className="th-option-2-col">
          <div className="th-option-row content-box">
             <div className="th-col">
              <img src={data.hunkcompanion.imgUrl}/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
            <h4>{data.hunkcompanion.name}</h4>
            <a className="plugin-detail thickbox open-plugin-details-modal" href={data.hunkcompanion.detail_link}>{__( 'Details &amp; Version', 'blur' )}</a>
            </div>
            <button data-activated="Activated" data-msg="Activating" data-init={data.hunkcompanion.active_filename} data-slug={data.hunkcompanion.slug} className= {`button install-now button ${data.hunkcompanion.slug}`} >{__( 'Install Now', 'blur' )}                
            </button>
            </div>
          </div>
          <div className="th-option-row content-box">
             <div className="th-col">
              <img src={data.th_all_in_one_woo_cart.imgUrl}/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
            <h4>{data.th_all_in_one_woo_cart.name}</h4>
            <a className="plugin-detail thickbox open-plugin-details-modal" href={data.th_all_in_one_woo_cart.detail_link}>{__( 'Details &amp; Version', 'blur' )}</a>
            </div>
            <button data-activated="Activated" data-msg="Activating" data-init={data.th_all_in_one_woo_cart.active_filename} data-slug={data.th_all_in_one_woo_cart.slug} className= {`button install-now button ${data.th_all_in_one_woo_cart.slug}`} >{__( 'Install Now', 'blur' )}                
            </button>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
}

export default PluginData;