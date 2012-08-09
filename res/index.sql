--drop table psurgeon_index;

create table psurgeon_index (
  entity text not null,
  is_definition boolean not null,
  file text not null,
  line_number integer
);

--drop index psurgeon_index_entity;

create index psurgeon_index_entity on psurgeon_index (entity, is_definition);
