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

/**
 * Generate margin + line-height CSS for the button icon pseudo-element.
 * Matches the D5 button example's buttonIconStyleDeclaration.
 * NOTE: content / font-family are handled separately via generateButtonIconCss().
 */
export const buttonIconStyleDeclaration = ({ attrValue }: BtnIconParams): string => {
  const declarations = new StyleDeclarations({
    returnType: 'string',
    important: {
      'font-size':   true,
      'line-height': true,
    },
  });

  if ('off' === (attrValue?.enable ?? 'off')) return declarations.value as string;

  const placement    = attrValue?.icon?.placement ?? 'right';
  const hasCustomIcon = Boolean(attrValue?.icon?.settings?.unicode);

  if ('left' === placement) {
    declarations.add('margin-left', '-1.3em');
  } else if (hasCustomIcon) {
    declarations.add('margin-left', '0.3em');
  }

  declarations.add('line-height', '1em');

  return declarations.value as string;
};

/**
 * Generate padding CSS when icon shows on hover only.
 */
export const buttonSpacingDeclaration = ({ attrValue }: BtnIconParams): string => {
  const declarations = new StyleDeclarations({
    returnType: 'string',
    important: false,
  });

  if ('on' === (attrValue?.icon?.onHover ?? 'on')) {
    declarations.add('padding-left',  '1em');
    declarations.add('padding-right', '1em');
  }

  return declarations.value as string;
};
