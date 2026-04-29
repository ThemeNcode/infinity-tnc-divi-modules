import { ModuleLibrary } from '@divi/types';
import { StarRatingAttrs } from './types';

export const placeholderContent: ModuleLibrary.Module.PlaceholderContent<StarRatingAttrs> = {
  starRatingData: {
    innerContent: {
      desktop: {
        value: {
          title:              'My Rating',
          count_star:         '5',
          rating:             '4',
          show_rating_number: 'off',
          icon_color:         '#EBC03F',
          empty_color:        '#AAAAAA',
          star_size:          '25',
          gap:                '0',
          star_alignment:     'left',
        },
      },
    },
  },
};
