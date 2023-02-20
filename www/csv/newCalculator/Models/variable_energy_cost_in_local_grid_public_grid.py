from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class variable_energy_cost_in_local_grid_public_grid(Base):
	__tablename__ = 'variable_energy_cost_in_local_grid_public_grid'
	id = Column(Integer, primary_key=True)
	LOC = Column(Text)
	Time = Column(Text)
	Type = Column(Text)
	PriceUnit = Column(Text)
	pathTofile = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)