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
    const [updateCls, setupdateCls] = useState(actcls);

    const checkActive = async (e) => {

      setupdateCls('button btn updating-message');

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
       setupdateCls('button btn activated disabled');

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
      className={updateCls}
      data-actstatus={props.actstatus}
      data-inststatus={props.inststatus}
      >
      {message}
      </button>
    );

  }

  function PluginList(props){
    return (
          <div className="th-option-row content-box">
             <div className="th-col">
              <img src={props.imgL}/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
            <h4>{props.name}</h4>
            <a className="plugin-detail thickbox open-plugin-details-modal" href={props.linkP}>{props.dtlText}</a>
            </div>
            <Button init={props.init} slug={props.slug} actstatus={props.actstatus} inststatus={props.inststatus}>                
            </Button>
            </div>
          </div>
        
    );
  }

  const detailText = __( 'Details & Version', 'blur' );

  return (
    <Fragment>
      <div className="recommended-option-wrap">
      <div className="th-option-2-col">
      <PluginList init={data.th_advance_product_search.active_filename} slug={data.th_advance_product_search.slug} actstatus={wpapi.thaps_status.thaps_active} inststatus={wpapi.thaps_status.thaps_instl} name={data.th_advance_product_search.name} imgL={data.th_advance_product_search.imgUrl} linkP={data.th_advance_product_search.detail_link} dtlText={detailText}></PluginList>
      <PluginList init={data.th_all_in_one_woo_cart.active_filename} slug={data.th_all_in_one_woo_cart.slug} actstatus={wpapi.thiowc_status.thiowc_active} inststatus={wpapi.thiowc_status.thiowc_instl} name={data.th_all_in_one_woo_cart.name} imgL={data.th_all_in_one_woo_cart.imgUrl} linkP={data.th_all_in_one_woo_cart.detail_link} dtlText={detailText}></PluginList>
      <PluginList init={data.th_product_compare.active_filename} slug={data.th_product_compare.slug} actstatus={wpapi.thpc_status.thpc_active} inststatus={wpapi.thpc_status.thpc_instl} name={data.th_product_compare.name} imgL={data.th_product_compare.imgUrl} linkP={data.th_product_compare.detail_link} dtlText={detailText}></PluginList>
      <PluginList init={data.th_variation_swatches.active_filename} slug={data.th_variation_swatches.slug} actstatus={wpapi.thvs_status.thvs_active} inststatus={wpapi.thvs_status.thvs_instl} name={data.th_variation_swatches.name} imgL={data.th_variation_swatches.imgUrl} linkP={data.th_variation_swatches.detail_link} dtlText={detailText}></PluginList>
      <PluginList init={data.lead_form_builder.active_filename} slug={data.lead_form_builder.slug} actstatus={wpapi.thlf_status.thlf_active} inststatus={wpapi.thlf_status.thlf_instl} name={data.lead_form_builder.name} imgL={data.lead_form_builder.imgUrl} linkP={data.lead_form_builder.detail_link} dtlText={detailText}></PluginList>
      <PluginList init={data.wp_popup_builder.active_filename} slug={data.wp_popup_builder.slug} actstatus={wpapi.thwpbl_status.thwpbl_active} inststatus={wpapi.thwpbl_status.thwpbl_instl} name={data.wp_popup_builder.name} imgL={data.wp_popup_builder.imgUrl} linkP={data.wp_popup_builder.detail_link} dtlText={detailText}></PluginList>
      </div>
      </div>
    </Fragment>
  );
  
}

export default PluginData;