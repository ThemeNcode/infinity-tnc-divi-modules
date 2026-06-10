import { 
  ModuleFlatObjectNamed, 
  ModuleFlatObjects,
  type EditPost
} from '@divi/types';

export type ModuleFlatObjectItems = (
  ModuleFlatObjectNamed<'inftnc/embed-map'>
);

export type ExampleModuleFlatObjects = ModuleFlatObjects<ModuleFlatObjectItems>;

export type ExampleMutableEditPostStoreState = EditPost.Store.State<ExampleModuleFlatObjects>;

export type ExampleEditPostStoreState = EditPost.Store.ImmutableState<ExampleModuleFlatObjects>;