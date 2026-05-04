import {
  isFaIcon,
  escapeFontIcon,
  processFontIcon,
} from '@divi/icon-library';
import { StyleDeclarations } from '@divi/style-library';

interface BtnIconParams {
  attrValue?: {
    enable?: string;
    icon?: {
      enable?: string;
      settings?: any;
      placement?: string;
      onHover?: string;
    };
  };
}

/** Margin + line-height for button icon pseudo-element. Matches D5 button buttonIconStyleDeclaration. */
export const buttonIconStyleDeclaration = ({ attrValue }: BtnIconParams): string => {
  const declarations = new StyleDeclarations({
    returnType: 'string',
    important: {
      'font-family': true,
      'font-size':   true,
      'line-height': true,
      content:       true,
    },
  });

  const iconSettings = attrValue?.icon?.settings;
  const fontIcon     = processFontIcon(iconSettings as any);

  if (fontIcon) {
    const fontFamily = isFaIcon(iconSettings as any) ? 'FontAwesome' : 'ETmodules';
    declarations.add('content', `'${escapeFontIcon(fontIcon)}'`);
    declarations.add('font-family', `"${fontFamily}"`);
  }

  const placement     = attrValue?.icon?.placement ?? 'right';
  const hasCustomIcon = Boolean(fontIcon);

  if ('left' === placement) {
    declarations.add('margin-left', '-1.3em');
  } else if (hasCustomIcon) {
    declarations.add('margin-left', '0.3em');
  }

  declarations.add('line-height', '1em');

  return declarations.value as string;
};

/** Padding for button when icon is show-on-hover. Matches D5 button buttonSpacingDeclaration. */
export const buttonSpacingDeclaration = ({ attrValue }: BtnIconParams): string => {
  const declarations = new StyleDeclarations({
    returnType: 'string',
    important: false,
  });

  if ('on' === (attrValue?.icon?.onHover ?? '')) {
    declarations.add('padding-left',  '1em');
    declarations.add('padding-right', '1em');
  }

  return declarations.value as string;
};
