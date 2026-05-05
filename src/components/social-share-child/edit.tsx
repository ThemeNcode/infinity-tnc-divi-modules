import React, { ReactElement } from 'react';
import { ModuleContainer } from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { SocialShareChildEditProps } from './types';
import { ModuleStyles } from './styles';
import { moduleClassnames } from './module-classnames';

const networkLabels: Record<string, string> = {
  facebook:  'Share on Facebook',
  whatsapp:  'Share on WhatsApp',
  twitter:   'Share on X',
  pinterest: 'Share on Pinterest',
  linekdin:  'Share on LinkedIn',
  telegram:  'Share on Telegram',
  reddit:    'Share on Reddit',
  tumblr:    'Share on Tumblr',
  email:     'Share on Email',
  blogger:   'Share on Blogger',
};

const networkIconClass: Record<string, string> = {
  facebook:  'inftnc_social_fb',
  whatsapp:  'inftnc_social_whatsapp',
  twitter:   'inftnc_social_twiiter',
  pinterest: 'inftnc_soical_pinterest',
  linekdin:  'inftnc_soical_linekdin',
  telegram:  'inftnc_soical_telegram',
  reddit:    'inftnc_soical_reddit',
  tumblr:    'inftnc_soical_tumblr',
  email:     'inftnc_soical_email',
  blogger:   'inftnc_soical_blogger',
};

export const SocialShareChildEdit = (props: SocialShareChildEditProps): ReactElement => {
  const {
    attrs,
    parentAttrs,
    elements,
    id,
    name,
  } = props;

  const data    = getAttrByMode(attrs?.socialShareChildData?.innerContent) ?? {};
  const network = (data as { social_share?: string }).social_share ?? 'facebook';
  const label   = networkLabels[network] ?? network;
  const iconCls = networkIconClass[network] ?? '';

  return (
    <ModuleContainer
      attrs={attrs}
      parentAttrs={parentAttrs}
      elements={elements}
      id={id}
      name={name}
      stylesComponent={ModuleStyles}
      classnamesFunction={moduleClassnames}
    >
      {elements.styleComponents({
        attrName: 'module',
      })}
      <div className="inftnc_share_button">
        <a className={`inftnc_share_link inftnc_${network}_share_link`} href="#" onClick={e => e.preventDefault()}>
          <span className="inftnc_social_text">{label}</span>
          <span className={`inftnc_social_icon ${iconCls}`}>
            {network === 'twitter' ? <>&#xe094;</> : null}
          </span>
        </a>
      </div>
    </ModuleContainer>
  );
};
