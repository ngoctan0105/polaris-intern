"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.build = exports.decorator = void 0;
const utils_1 = require("../utils");
exports.decorator = (0, utils_1.optoinNullableMemberDecorator)(function (proto, name, key) {
    const slot = (0, utils_1.obtainSlot)(proto);
    let map = slot.obtainMap('emit');
    map.set(name, typeof key === 'undefined' ? null : key);
});
function build(cons, optionBuilder) {
    var _a;
    (_a = optionBuilder.methods) !== null && _a !== void 0 ? _a : (optionBuilder.methods = {});
    const proto = cons.prototype;
    const slot = (0, utils_1.obtainSlot)(proto);
    const names = slot.obtainMap('emit');
    const emits = slot.obtainMap('emits');
    if (names) {
        names.forEach((value, key) => {
            const eventName = value === null ? key : value;
            emits.set(eventName, true);
            optionBuilder.methods[key] = function () {
                return __awaiter(this, arguments, void 0, function* () {
                    const ret = proto[key].apply(this, arguments);
                    if (ret instanceof Promise) {
                        const proRet = yield ret;
                        this.$emit(eventName, proRet);
                    }
                    else {
                        this.$emit(eventName, ret);
                    }
                });
            };
        });
    }
}
exports.build = build;
//# sourceMappingURL=emit.js.map