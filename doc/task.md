# Context

ProcurePro is a __procurement solution for commercial builders__. Imagine you're building a hotel, school or hospital -
you don't do all the work yourself. Instead, you will __engage many vendors__ to do the work for you (e.g.
earthworks, plumbers, electricians, etc).

Our user personas are:

- __contract administrators__: responsible for engaging the vendors on a project
- __project managers__: oversee the contract administrators on a project
- __commercial managers__: oversee the commercial details across all vendors and projects

In order to find the best vendor for the job, you run a __tender process__ and receive
a __number of different quotes__. Now you put these quotes into a "__comparison__" to help you compare each one.

1. __Price__: the bottom line quote you receive
2. __Discount__: any discount that you are able to negotiate with the vendor (eg. "mates rates")
3. __Adjustment__: price adjustments you need to account for (e.g. changes to the design or materials, etc.)
4. __Unlet cost__: ancillary costs you are expecting to spend (e.g. items the vendor has excluded, contingencies,
   etc.)

# Tasks

You are to implement the following requirements in the Symfony application provided. You are free to implement them
however you like, but you should aim to align with our [concepts](/doc/concepts.md).

## Business Rules

These are the currently identified business rules which the User Stories align with. You should identify more or change
them as you work through the challenge.

> The only required vendor property is the `name`.

> Users can set individual or multiple costs.

> Users can clear properties which have been accidentally set.

## User stories

The following user story is a starting point, it has some concrete examples to provide clarity and understanding of the 
expected behaviour. You should identify more examples or user stories you work through the challenge.

### Story 1: Comparing vendors

```
As a contract administrator
I want to compare the total cost across vendors
So that I can assess the best vendor for the job
```

#### Example 1: The one where I setup my comparison

```
I add “Roger’s Earthworks” and "TerraCore Solutions"
I set "TerraCore Solutions" costs
  - Price: $120,800.00
  - Discount: $3,000.00
```

#### Example 2: The one where I make a mistake

```
I add “Roger’s Earthworks”
  - Price: $110,500.00
  - Unlet cost: $3,100.50
I move the unlet cost to the adjustment
```
