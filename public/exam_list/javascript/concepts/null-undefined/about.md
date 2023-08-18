# About

In contrast to many other languages, there are two different entities in JavaScript that represent the absence of a (meaningful) value.
There is `null` and `undefined`.

## Null

The primitive value `null` is used as an intentional "empty value" for a variable.
In other languages, a similar construct might be used only for (missing) objects or pointer types.
In JavaScript `null` generally represents an empty value for any type.

```javascript
let name = null;
// name is intentionally set to "empty" because it is not
// available
```

You can check whether a variable is null by using the [strict equality operator][mdn-strict-equality] `===`.
Although `null` is a primitive value, the [`typeof` operator][mdn-typeof] "wrongly" returns `object` for [historic reasons][mdn-typeof-null].
That means it cannot be used by itself to check whether a variable is null.

```javascript
let name = null;

name === null;
// => true

// Pitfall:
typeof name;
// => 'object'
```

## Undefined

> A variable that has not been assigned a value is of type `undefined`.<sup>1</sup>

That means while `null` represents an empty value (but still a value), `undefined` represents the total absence of a value. 🤯

`undefined` appears in different contexts.

- If a variable is declared without a value (initialization), it is `undefined`.
- If you try to access a value for a non-existing key in an object, you get `undefined`.
- If a function does not return a value, the result is `undefined`.
- If an argument is not passed to a function, it is `undefined`, unless that argument has a default value.

```javascript
let name;
console.log(name);
// => undefined

let obj = { greeting: 'hello world' };
console.log(obj.missingKey);
// => undefined

function returnNothing() {
  return;
}
console.log(returnNothing());
// => undefined
```

You can check whether a variable is undefined using the strict equality operator `===` or the `typeof` operator.

```javascript
let name;

name === undefined;
// => true

typeof name === 'undefined';
// => true
```

It is not recommended to manually assign `undefined` to a variable, always use `null` instead to make it clear you set an empty value intentionally.

## Optional Chaining

As mentioned above, accessing a non-existent key in an object returns `undefined` in JavaScript.
However, if you try to retrieve a nested value and the parent key does not exist, the evaluation of the nested key is performed on `undefined` and leads to `TypeError: Cannot read property ... of undefined`.
Theoretically, you would always need to check the parent key exists before you can try to retrieve the nested key.
This was often done with the AND operator `&&` but for deeply nested values this leads to very lengthy expressions.

```javascript
obj.level1 && obj.level1.level2 && obj.level1.level2.level3;
```

To solve this problem, [optional chaining][mdn-optional-chaining] was added to the language specification in 2020.
With the optional chaining operator `?.` you can ensure that JavaScript only tries to access the nested key if the parent was not `null` or `undefined`.
Otherwise `undefined` is returned.

```javascript
const obj = {
  address: {
    street: 'Trincomalee Highway',
    city: 'Batticaloa',
  },
};

obj.residence;
// => undefined

obj.address.zipCode;
// => undefined

obj.residence.street;
// => TypeError: Cannot read property 'street' of undefined

obj.residence?.street;
// => undefined

obj.residence?.street?.number;
// => undefined
```

## Nullish Coalescing

There are situations where you want to apply a default value in case a variable is null or undefined.
In the past this was often done with a ternary operator `?` or by utilizing lazy evaluation of the OR operator `||`.
This has the disadvantage that the default value is applied in all cases where the variable is [falsy][mdn-falsy] (e.g. `''` or `0`), not only when it is null or undefined.
This can easily cause unexpected outcomes.

```javascript
let amount = null;
amount = amount || 1;
// => 1

amount = 0;
amount = amount || 1;
// => 1

amount = 0;
amount ? amount : 1;
// => 1
```

To address this, the [nullish coalescing operator][mdn-nullish-coalescing] `??` was introduced.
Just like optional chaining, it was added to the language specification in 2020.
The nullish coalescing operator `??` returns the right-hand side operand only when the left-hand side operand is `null` or `undefined`.
Otherwise, the left-hand side operand is returned.
With that, a default value can now be applied more specifically.

```javascript
let amount = null;
amount = amount ?? 1;
// => 1

amount = 0;
amount = amount ?? 1;
// => 0
```

---

[1] Undefined, MDN. (2021). https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/undefined (accessed June 4, 2021).

[mdn-strict-equality]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Strict_equality
[mdn-typeof]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/typeof
[mdn-typeof-null]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/typeof#typeof_null
[mdn-optional-chaining]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Optional_chaining
[mdn-falsy]: https://developer.mozilla.org/en-US/docs/Glossary/Falsy
[mdn-nullish-coalescing]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Nullish_coalescing_operator
