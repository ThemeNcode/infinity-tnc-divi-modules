// The purpose of this file is to prevent tsc to throw "Cannot find type definition file"
// error on tsconfig. It seems like `index.d.ts` in root is needed if the package name
// is started with `@types/*`. See:
// - https://github.com/microsoft/TypeScript/issues/27956#issuecomment-430849185
