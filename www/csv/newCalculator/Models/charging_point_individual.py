from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class charging_point_individual(Base):
	__tablename__ = 'charging_point_individual'
	id = Column(Integer, primary_key=True)
	CPID = Column(Text)
	LOC = Column(Text)
	CPName = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	ChrgCap = Column(Text)
	Com = Column(Text)
	Connector = Column(Text)
