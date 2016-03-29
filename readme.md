# WordPress core autoloader proposal

Hello and welcome! This is a proposal on a WordPress class autoloader mentioned in the core trac ticket
[36335](https://core.trac.wordpress.org/ticket/36335)

The goal is to provide a full featured, well tested proposal on how a autoload module for the WordPress core could look like.

**Contribution is highly appreciated!**

Current Status: **very early draft**

## Conceptual basic points

 The implementation:
 
 * must support PHP 5.2 even without SPL enabled
 * should be object orientated following SOLID principles
 * completely unit tested (tests are made in isolation)
 * completely documented

The current development requirements are set to 5.4. Tests will be made backward compatible later.

## Current questions

For the following questions, pros and cons have to be listed, discussion and decisions have to be made: 

 * Supporting a configuration file for autoloading rules?
 * Provide caching for autoloading rules? (Means caching the resolved file paths?) 
 * Should the support for no-SPL implemented internally by investigating every rule and turn it to a static class map? 
 Or should it be a public interface in the API (e.g. `$autoloader->add_spl_fallback_rule()`)?
