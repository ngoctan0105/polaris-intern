import type { BaseTypeIdentify } from './index';
declare class Slot {
    master: any;
    constructor(master: any);
    names: Map<string, Map<string, any>>;
    obtainMap<T extends Map<string, any>>(name: string): T;
    inComponent: boolean;
    cachedVueComponent: any;
}
export declare function makeSlot(obj: any): Slot;
export declare function getSlot(obj: any): Slot | undefined;
export declare function obtainSlot(obj: any): Slot;
export declare function makeObject(names: string[], obj: any): Record<string, any>;
export declare function toComponentReverse(obj: any): any[];
export declare function getSuperSlot(obj: any): Slot | null;
export declare function excludeNames(names: string[], slot: Slot): string[];
export declare function getValidNames(obj: any, filter: (des: PropertyDescriptor, name: string) => boolean): string[];
export declare function optoinNullableMemberDecorator<T>(handler: {
    (proto: any, name: string, option?: T): any;
}): {
    (option?: T): any;
    (proto: BaseTypeIdentify, name: any): any;
};
export {};
//# sourceMappingURL=utils.d.ts.map