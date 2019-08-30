# Release Notes

# v1.7.24 (2017-11-05)

### Fixed

- Fix conflict in dashboard layouts [#147](https://github.com/amranidev/scaffold-interface/issues/147).

# v1.7.22 (2017-10-25)

### Fixed

- Replace vinkla/pusher with pusher/pusher-http-laravel.

## v1.7.21 (2017-10-04)

### Enhanced

- Add laravel v5.5 support.

### Fixed

- Fix the installation error.

## v1.7.15 (2017-06-30)

### Enhanced

- Customize routes adding `scaffold` prefix (scaffold-dashboard, scaffold-users, . . ).

- Add fontawesome to buttons.

- Add automatic package discovrey supporting laravel 5.5.

## v1.7.1 (2017-02-20)

### Fixed

- Fix ManyToMany bug [#112](https://github.com/amranidev/scaffold-interface/issues/112)

## v1.7.0 (2017-02-02)

### Added

- Models visualization through a graph presentation.

## v1.6.35 (2017-01-02)

### Enhanced

- Use Laravel v5.3 routes path by default.

## v1.6.31 (2016-11-23)

### Enhanced

- Views(index,create,edit,show) will be formatted properly among creating CRUD.
- (Entity/Model) layouts handle AdminLTE as well as dashboard.

## v1.6.21 (2016-11-10)

### Enhanced

- Views layouts will be published to your app under (/resources/views/scaffold-interface/layouts/).

### Fixed

- Fix error message (DeleteMessage).

## v1.6.12 (2016-10-26)

### Added

- Pagination will be generated automatically.

### Enhanced

- Enhance dashboard.

## v1.6.10 (2016-10-21)

### Fixed

- Change **lists** method to **pluck** according to Laravel v5.2 and v5.3.

## v1.6.9 (2016-10-16)

### Enhanced

- Control panel lists all entities automatically.

## v1.6.7 (2016-10-13)

### Fixed

- Fix OneToMany duplicated error.
- Fix ManyToMany stup.

## v1.6.3 (2016-10-9)

### Fixed

Fix rollback problems.
 
 - Fix rollback link [63fc567](https://github.com/amranidev/scaffold-interface/commit/ca1ca9f415340199fc42460f6d355d7085993bb1).

 - Fix routes path [a6c4b1b](https://github.com/amranidev/scaffold-interface/commit/e1611db39de6f17f28c5a50a7d13e65baae2227b).

## v1.6.0 (2016-10-3)

### Added

Integrate [Pusher](https://pusher.com/) websockets.

## v1.5.35 (2016-09-24)

### Fixed

- Change lists method to pluck. 

## v1.5.32 (2016-09-10)

### Enhanced

- Update vuejs from v1.0.24 to v1.0.26 

## v1.5.30 (2016-09-10)

### Added

- Add ManyToMany ralationships generator.

## v1.5.15 (2016-08-16)

### Added

- Add timepstamps and softdeletes.

## v1.5.0 (2016-08-14)

### Added

- Add a user interface dashboard with Bootstrap AdminLTE.
- Add user management system (user-role-permission) using [laravel-permission](https://github.com/spatie/laravel-permission).

## v1.4.32 (2016-07-12)

### Enhanced

- Use Laravel **url()** helper to generate urls into views.

## v1.4.31 (2016-07-08)

### Enhanced
- Enhance controller php styles.
- Enhance view html code style convention.

## v1.4.27 (2016-06-22)

### Fixed
- Fix OneToMany select field bug [786e74](https://github.com/amranidev/scaffold-interface/commit/786e74de0a62d7cc88c80617f88bec02dd3e40cd).

## v1.4.25 (2016-06-18)

### Added

- Added overiding foreignKeys convention [f037165](https://github.com/amranidev/scaffold-interface/commit/f03716595ca027a19588730b2c9f9ebb83310988).
- Added Support for RDBMS (Mysql,Postgres,Sqlite).

## v1.4.23 (2016-05-30)

### Added

- Allow to select others tables which not generated by scaffold-interface.
- Allow switching dev-env [10bfee31](https://github.com/amranidev/scaffold-interface/commit/10bfee31fffa407b1b561c2bd7344563f5e43a88).