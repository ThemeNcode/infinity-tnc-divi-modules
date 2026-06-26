export interface ShortcodeModuleTextShadowFieldPreset {
  icon?: string;
  value: string;
  content?: Record<string, string>;
  fields?: Record<string, string>;
}

export type ShortcodeModuleTextShadowPresetName = 'none' |
  'preset1' |
  'preset2' |
  'preset3' |
  'preset4' |
  'preset5';

export type ShortcodeModuleTextShadowFieldPresets = ShortcodeModuleTextShadowFieldPreset[];

export type ShortcodeModuleTextShadowFieldDefault = [
  string,
  Record<ShortcodeModuleTextShadowPresetName, string>
]
